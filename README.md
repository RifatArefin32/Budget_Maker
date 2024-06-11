## Setup and Configure the web.php
- First setup the db.php [connect the database]
- Config the web.php file

## User Signup and Login
- Create migration of User
- Create a model class "User"
- Create a model class "SignupForm"
- Create a view "signup"
- Create a action function @ SiteController
- Try Signup and login

## User CRUD using REST 
- Now Create UserController to CRUD user
- Configure the web.php to perform REST
- Use postman to check the CRUD of users

## Expense CRUD using UI and REST (using Modules) 
- Create a table "expense" using migration
- Generate a Model and CRUD files using gii
- Generate a module and Create a ExpenseController
- Configure the module in the config/web.php (see 'modules' in the config file)
- Perfrom GET request for expense/ particular expense
- Configure the request to define the parsers at config/web.php
- Create "modules/budget/controller/ExpenseController" and make Create, Update, Delete function
- Apply different types of http authentication
    

## Follow Step by Step to Learn Yii2 REST Basics
- [Generate a Model and CRUD using /gii](https://www.youtube.com/watch?v=OVOy00vdCdY&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=7)

- [Generate Module to setup REST APIs and Perform GET request](https://www.youtube.com/watch?v=1OmNBN5CuUs&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=6)

- [Perform CREATE, UPDATE and DELETE request methods](https://www.youtube.com/watch?v=_4ALKYLvTmY&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=8)

- [Http Bearer Authentication](https://www.youtube.com/watch?v=copVdsoelHw&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=14)

- [Http Basic Authentication](https://www.youtube.com/watch?v=RpkKZVh8UDE&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=17)

- [Http Query Param Authentication](https://www.youtube.com/watch?v=19PCu4qK_WU&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=18)

- [Http Composite Authentication](https://www.youtube.com/watch?v=MPNfnNoaBzo&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=19)

- [Http Exclude End Point Authentication](https://www.youtube.com/watch?v=4eTWJOmqxLI&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=20)

- [Http Optional End Point Authentication](https://www.youtube.com/watch?v=cJCBoK5SeU8&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=21)

- [Http Specific End Point Authentication](https://www.youtube.com/watch?v=mw3MR-x2vTs&list=PLMhOp68dQOeaIIuQ6nh-VqjKxmf9RsE18&index=22)