# IdeaBase Starter Kit 2.0
IdeaBase Starter Kit v2 - Includes Grunt + Pattern Lab + Craft CMS

## Setup Instructions

### GitHub Instructions

* Create a New Repository under IdeaBase
* Install Tower https://www.git-tower.com/mac/ or GitHub Desktop (or use command line if you want)
* Log in with GitHub credentials and clone the new repository
* Download the IdeaBase Starter Kit 2.0 zip file and copy the files into the repository
* Commit and push changes to repository using "Push - Tower" or "Publish - Github Desktop"

### MAMP (PHP, MySQL)

* Install MAMP Pro http://mamp.info
* Under ports - click the button to Set server ports to 80, 81, etc...
* Set up a new host directory (aka something.web) and point to the "public" or "html" folder instead of the root
 * Click the plus button underneath the box where "localhost" is listed
* Set up a local database, if using a CMS
* Set the default password for MySQL to "root"
* Start Servers

### CMS Instructions

* Rename the craft/config/db-backup.php to be db.php
* Edit the craft/config/db-backup.php file with the LOCAL database name (assuming the password and user name are root)
* You can "Ignore" the db.php file once it's been edited with the local info so there's no chance of it being overwritten to production.
* Important - change the public/htaccess file to be .htaccess.  
* In craft/config/general.php - change the LOCAL url to your actual local URL.
* Go to your local URL/admin to begin CMS setup.

### Pattern Lab

* If using Pattern Lab, change the "htaccess" file in the public/lab folder to .htaccess, which will automatically redirect visitors to /lab to the /lab/public directory

### Command Line Instructions

* Install Node.js for your OS https://nodejs.org/en/download/
* Open the command line interface
* Type "sudo gem install sass" and enter
* Type "sudo npm install -g grunt-cli" and enter
* Navigate to the directory where your project is located (the public or html folder)
* Type "sudo npm install" and enter
* Type "grunt" and hit enter.
* Save a file to test grunt build process

Grunt will do the following:

* Compile all sass in compressed format
* Autoprefix CSS
* Combine and compress all JavaScript files
* Autobuild the Pattern Lab files (if needed)
* Autorefresh the browser when HTML or CSS files are updated

**To do:  Fix the critical CSS **
