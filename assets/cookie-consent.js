
window.addEventListener('DOMContentLoaded', function() {
    
    function getCookie(name) {
        const cookies = "; " + document.cookie;
        const parts = cookies.split("; " + name + "=");
        if (parts.length === 2) {
            return parts.pop().split(";").shift();
        }
        return null;
    }
    
    function setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = name + "=" + value + "; expires=" + expires.toUTCString() + "; path=/";
    }
    
    setTimeout(function() {
        const cookieAlert = document.querySelector('.cookiealert');
        const acceptButton = document.querySelector('.acceptcookies');
        
        
        if (cookieAlert) {
            const cookieConsent = getCookie('userCookieConsent');
            
            if (cookieConsent === 'accepted') {
                cookieAlert.style.display = 'none';
                cookieAlert.classList.remove('show');
            } else {
              
                cookieAlert.style.display = 'block';
                cookieAlert.classList.add('show');
            }
            
            if (acceptButton) {
                const newButton = acceptButton.cloneNode(true);
                acceptButton.parentNode.replaceChild(newButton, acceptButton);
                
                newButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    
                    setCookie('userCookieConsent', 'accepted', 365);
                    
                    cookieAlert.style.display = 'none';
                    cookieAlert.classList.remove('show');
                    
                });
                
            } else {
            }
        } else {
        }
    }, 100); 
});
