#MeetingRoomBooking

To run the project on localhost the following steps are involved:

1. Download xampp from www.apachefriends.org

2. Make it executable by running the command ”chmod 755 [package name]”

3. Launch Setup wizard using command: ./xampp-linux-7.2.10-0-installer.run

4. Launch application after installation using: sudo opt/lampp/lampp start

5. Type localhost/phpmyadmin to connect to dashboard and create databases

6. Create project folder in opt/lampp/htdocs.

7. Launch project by typing localhost/projectname in address bar

8. Use the functionalities of the project.

9. You can shut the server using the command:
        sudo opt/lampp/lampp stop

10. Create a database in phpmyadmin by going to this url after starting server:
        localhost/phpmyadmin

11. Run the wtl.sql file in the database to load the tables

12. Make changes to the mysqli.php and config.php folder in order to connect to the database
    by adding the databse name and root and root password

13. Make changes to the email.php, cancel.php, forgot_tpassword.php file by installing PHPMailer and by 
    providing the path to the installation in the mentioned files to enable email related 
    functionalities.

14. If you are using Linux-based OS, you would have to install PHPMailer and make changes to the
    path in email.php, cancel.php, forgot_tpassword.php fies.
    
15. In case of any problem you can contact: yashagarval@gmail.com 

#Errors

1. In case of errors regarding database, stop mySQL service by typing:
        service mysql stop
        
2. Then restart the folder
        
     
        
