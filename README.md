# theses_database
Athore : Author: Shiva Manhar (shivamanhar)
Description: Theses Database is one web application. It is use for upload theses file and search upload theses.

Where you can use: college project , school project and samll theses uploading in library. 
One anthor word use this application is library managament application.

How to install:

Step: 1
If you are want to install in localhost so htdocs folder create theses folder. Than all folder and file copy in this folder. 

Step:2 

find file theses.sql 

Import data base file in you MySQL database.

Step:3

Go to Application folder > Confing > find a 
        database.php file and edit somting.
        change in ather line number 51
        
        $db['default']['hostname'] = 'localhost';
        $db['default']['username'] = 'root';  //change here database user name.
        $db['default']['password'] = ''; //change here database password .
        $db['default']['database'] = 'theses'; // change here database name.
        
Step:4

If you want to change folder name than you want to change somting.

in .htaccess file

                <IfModule mod_rewrite.c>
                RewriteEngine On
                RewriteBase /theses
                
        Change when you folder name in where write theses.
        
and change Application>confing> config.php file

Line 17

Here change your host name and folder name:

        $config['base_url']	= 'http://localhost/theses'; //192.168.5.206

If you have any problem in deploy this application.
you can contact me:

My Email : shivamanhar@gmail.com 
