MY FISHING BOAT APP
Sorina DUMITRESCU
26.03.2017
-------------------------------------------------------------------------------------------------------------------------
USED INFRASTRUCTURE:
- WAMP Server: 
				- APACHE 2.4.9
				- PHP 5.5.12
				
Back-end Framework: SLIM Micro framework V3
	- Slim has been executed on the PHP built-in server using the command "php -S localhost:8080"

JQuery, Bootstrap and SLIM have been installed using Composer (the Vendor and Log folders have been removed from the source files)

The interface is available through /index.html.

The back-end is a RESTful API. The call to the server is done through an AJAX.post() containing the 3 required parameters.
The server responds with a JSON.
The logs are managed through Monolog.

The application does not validate input.

