# G-Option4 

- Quick overview how to get it working, and how the project was made

The files included are for the option 4. Assuming that option 4 was allowed to be created in any language of preference, if not, please state which language, and it shall be re-done.

Chosen option 4 is built using; HTML, PHP, MySQL and JavaScript.

To get the website to work as intended, the linked 'google-option4.sql' file should be uploaded to local database, and the script files should be included in the htdocs folder (if using xampp, otherwise, the local directory for the website to work).

As an example; Using PHPMYADMIN, the .sql file would be uploaded to the database and then making sure that the _DBConnection.php in classes folder contains the correct connection link to the database.

Once the .sql file is uploaded to the database, the other project files/folders should be stored in a directory, as an example, if using xampp software, going to: C:\xampp\htdocs\[folder for the web] and uploading the files there would mean that when the Apache and MySQL services are started in xampp, it will allow the user to test the website by going to Google Chrome, and in the URL entering: localhost/[folder for the web]. As there is an index.php file, it will be loaded if done correctly, and the data from the database will be displayed. 

- Quick overview on how to use the website

To get started and use the website, there are 2 buttons available to click: Search and Load All Pets. 
Clicking on 'Load All Pets' will load every single pet in the database table (or every single row from the table will be displayed).
Clicking on 'Search' will load what was entered in the text field, if the entered text matches what is in the database table, it will be displayed.

- If there are any issues installing or getting stuff to work, please get in touch and I will be able to help out and explain in complete detail how to make sure it works the way it is meant too.

- Links used while creating the project files:

https://www.w3schools.com/jquery/jquery_get_started.asp - used to retrieve the link to the third party library - jquery
https://getbootstrap.com/docs/3.3/getting-started/ - used to retrieve the link to third part library - bootstrap
https://jqueryui.com/autocomplete/ - researched how to do autocompletion, user jqueryui website as it has got a UI aspect, which the autocompletion falls under.
