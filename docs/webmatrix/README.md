# Webmatrix

Create new folder under My Web sites (Bridge) to project domain name.

Open [Joomla.org](http://www.joomla.org/) and download latest version (full version).

Unzip Joomla installation into project domain folder.

Launch webmatrix as administrator. Open folder as site and select the folder you set up above.

Set up database in Webmatrix by selecting Databases and click project domain name. Click New Database, select MySQL database. Name Database (project domain name).  Save password, OK.  (Remember that the username should never be root and the password admin if open on web)  OK if on local server.

Once database has been created, Under Webmatrix click run and select chrome. This will take you to the Joomla installer.

Config:
Complete details (Site Name: e.g. Imizamo Yethu Tours Cape Town)

Description: Add later.

Username: 2dpi  Password: normal
Admin Email: info@2dpi.co.za

Next

Database:
Username: root
Password: admin
Database Name: (Go back to Webmatrix to check)

Next

Overview:
Change Nothing > Install.


Under My Websites:
Delete Joomla Instalation Folder & zip file.
Rename htaccess.txt to .htaccess

In Webmatrix under Site, settings rename local host to the-bridge:

Run in chrome.

To access across the network you will need to open the port in windows firewall:

Windows Firewall >Advanced settings > Inbound Rules > New Rule

Port > next > TCP > Specific local ports [add port number from URL] > next > allow connection > check all > next > name the rule > finished.

Under extensions > extensions manager > add install from web tab.

Search seblod, jce, remoteImage, xmap > install latest versions.

Download and install www template framework > zip and unpack under templates in new site folder.

Automatic Verson:

Launch webmatrix as administrator > New App Gallery > Joomla > Next

Change site name to e.g.2dpi Accounts > Next > Accept

Load Sample data > No

Website Name: 2dpi Accounts

Site Admin Password: usual

Admin Email:info@2dpi.co.za > Next > OK





