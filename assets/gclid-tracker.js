/**
 * GCLID Tracker for Google Ads Conversion Tracking
 * Captures gclid parameter from URL and stores it for form submissions
 */

(function() {
    'use strict';

    // GCLID tracker object
    window.GclidTracker = {
        // Storage key for GCLID data
        STORAGE_KEY: 'gclid_data',
        
        // GCLID expiration time (90 days in milliseconds)
        EXPIRATION_TIME: 90 * 24 * 60 * 60 * 1000,
        
        /**
         * Initialize GCLID tracking
         */
        init: function() {
            this.captureGclid();
            this.addFormHandlers();
        },
        
        /**
         * Capture GCLID from URL parameters
         */
        captureGclid: function() {
            const urlParams = new URLSearchParams(window.location.search);
            const gclid = urlParams.get('gclid');
            
            if (gclid) {
                const gclidData = {
                    gclid: gclid,
                    timestamp: Date.now(),
                    url: window.location.href,
                    referrer: document.referrer || ''
                };
                
                // Store in localStorage
                try {
                    localStorage.setItem(this.STORAGE_KEY, JSON.stringify(gclidData));
                } catch (e) {
                    console.warn('Could not store GCLID data:', e);
                }
            }
        },
        
        /**
         * Get stored GCLID data if not expired
         */
        getGclidData: function() {
            try {
                const stored = localStorage.getItem(this.STORAGE_KEY);
                if (stored) {
                    const data = JSON.parse(stored);
                    const now = Date.now();
                    
                    // Check if data is not expired (90 days)
                    if (now - data.timestamp < this.EXPIRATION_TIME) {
                        return data;
                    } else {
                        // Remove expired data
                        localStorage.removeItem(this.STORAGE_KEY);
                    }
                }
            } catch (e) {
                console.warn('Could not retrieve GCLID data:', e);
            }
            return null;
        },
        
        /**
         * Get form data with GCLID information
         */
        getFormData: function() {
            const gclidData = this.getGclidData();
            if (gclidData) {
                return {
                    gclid: gclidData.gclid,
                    gclid_timestamp: gclidData.timestamp,
                    gclid_url: gclidData.url,
                    gclid_referrer: gclidData.referrer
                };
            }
            return {};
        },
        
        /**
         * Add hidden GCLID input to a form
         */
        addGclidInputToForm: function(form) {
            const gclidData = this.getGclidData();
            if (gclidData && form) {
                // Remove existing GCLID input if any
                const existingInput = form.querySelector('input[name="gclid"]');
                if (existingInput) {
                    existingInput.remove();
                }
                
                // Add new hidden input
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'gclid';
                hiddenInput.value = gclidData.gclid;
                form.appendChild(hiddenInput);
                
                // Add timestamp input
                const timestampInput = document.createElement('input');
                timestampInput.type = 'hidden';
                timestampInput.name = 'gclid_timestamp';
                timestampInput.value = gclidData.timestamp;
                form.appendChild(timestampInput);
            }
        },
        
        /**
         * Add form handlers to automatically inject GCLID data
         */
        addFormHandlers: function() {
            const self = this;
            
            // Wait for DOM to be ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    self.processAllForms();
                });
            } else {
                self.processAllForms();
            }
        },
        
        /**
         * Process all forms on the page
         */
        processAllForms: function() {
            const forms = document.querySelectorAll('form');
            const self = this;
            
            forms.forEach(function(form) {
                // Add GCLID input to form
                self.addGclidInputToForm(form);
                
                // Add submit event listener to update GCLID data before submission
                form.addEventListener('submit', function() {
                    self.addGclidInputToForm(form);
                });
            });
        }
    };
    
    // Initialize when script loads
    window.GclidTracker.init();
    
})();
