# COSC 3380 - Post Office Project
### Team members: Muhammad Mustafa Aslam, David A Carlon, Alejandro Gonzalez Parez, Adelaide Stevens, Michael Yannuzzi

Welcome to the world's best Post Office website! Our post office is international and provides services to any place on the map regardless of location, be it state or country. To go along with our post office services we also have a web shop build into the site where you can purchase shipping supplies and stamps. 

On our administrative side we provide services for post office admins including user lists, package lists, reports, and logs. 

## Project Overview:
For our project we used PHP MyAdmin, MySQL, PHP, HTML and CSS. For web hosting we used Amazon AWS Services and hosted out website and database on an Ubuntu Virtual machine.

## Wesbite Roles:
We have three roles on our website, user, employee, and admin. Website users are our customers and can choose to have their packages shipped with our post office services. To sign up, users can enter their information on our sign in page, including and email and a password they create, and can see the status of their packages. The packages status includes a shipping location, if the package is on time or delayed, and if the user checking their packages has a packing being shipped to them. 

On the company side, there are admin and employee accounts. Employee accounts has a location associated with it and can see the packages that are in that location. The employee account can view and update user accounts, and can only add packages and update packages in the database. The employee account cannot remove users from the databse or remove packages. The admin account has priviledges that allows them to add and delete user accounts, employee accounts, and packages. They are the most priviledged account on the website.

## Triggers:
* 1.user_trg_delete - This triggers when a user profile is deleted from the user database. A log of this action is saved in the logs database table. 
* 2.user_trg_insert - This triggers when a user profile is inserted to the user database. A log of this action is saved in the logs database table.
* 3.user_trg_update = This triggers when a user profile is updated in the user database. A log of this action is saved in the logs database table.


## Reports:
Our reports check the number of users we have, the number of active packages, sent packages, and revenue.

## Logs:
Our logs recieve updates based on our triggers. The updates we check for are updates in the user database when a user is 1) updated, 2) inserted, and 3) deleted. 


## Extra Steps:
There are no extra steps needed to access or use our website! Feel free to look around :)

Preset Users:
Admin: email: ATest1@gmail.com | pass: 1234 | address: ATest1 St | Full Name: 'Admin Test1'
Employee: email: ETest1@gmail.com | pass: 1234 | address: ETest1 St | Full Name: 'Employee Test1'
When sending a package, please use the receivers full name.
