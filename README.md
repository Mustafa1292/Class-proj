# COSC 3380 - Post Office Project
### Team members: Muhammad Mustafa Aslam, David A Carlon, Alejandro Gonzalez Parez, Adelaide Stevens, Michael Yannuzzi

Welcome to the world's best Post Office website! Our post office is international and provides services to any place on the map regardless of location, be it state or country. To go along with our post office services we also have a web shop build into the site where you can purchase shipping supplies and stamps. 

On our administrative side we provide services for post office admins including user lists, package lists, reports, and logs. 

## Project Overview:
For our project we used PHP MyAdmin, MySQL, PHP, HTML and CSS. For web hosting we used Amazon AWS Services and hosted out website and database on an Ubuntu Virtual machine.

## Wesbite Roles:
We have two roles on our website, employee and admin. Both employee and admin can view and edit user information such as the list of users and packages, but only the admin can remove users from the database. 

## Triggers:
1.user_trg_delete - This triggers when a user profile is deleted from the user database. A log of this action is saved in the logs database table. 
2.user_trg_insert - This triggers when a user profile is inserted to the user database. A log of this action is saved in the logs database table.
3.user_trg_update = This triggers when a user profile is updated in the user database. A log of this action is saved in the logs database table.


## Reports:
Our reports check the number of users we have, the number of active packages, sent packages, and revenue.

## Logs:
Our logs recieve updates based on our triggers. The updates we check for are updates in the user database when a user is 1) updated, 2) inserted, and 3) deleted. 


## Extra Steps:
There are no extra steps needed to access or use our website! Feel free to look around :)
