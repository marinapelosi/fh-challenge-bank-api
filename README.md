# Hello World!
Hi, my name is Marina and I'm thankful to be here making this challenge. This is the documentation for the developed software, and instructions for testing.

Normally, I use to make english modeling, code and documentation. I have no problem in make this in portuguese, if needed.

Let's go!

---
# FH Challenge Bank API REST

## Technical Information

This REST API was developed following the [JSON API specification](https://jsonapi.org/) and the Laravel Version is 8.0.4 (latest)
<img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version">

## Challenge Endpoints

|Method |Route Name	| Endpoint|Requires Auth? |Description |TDD functions (tests/Unit)
|--- |--- |--- |--- |--- |---
|GET | Check Account Balance | api/check-balance/{accountNumber} |No | Returns how much money the account has| testCheckBalance() 
|GET | Move Account Balance | api/move-account-balance/{accountNumber}/{amountMoney}/{moveType} |No | The magic happens here. You can get money from the account balance or put more money there. | testGettingMoney(), testGettingMoneyButDontHaveEnough(), testPuttingMoney(), testMoveValidation(), testInvalidAccountInDatabase()

### To test the endpoints you must use the fake data persisted via seeders and factories

|User        |Account Number | Type Field
|---         |---            |---
|Random      |889955-1       | String                         
|Random      |435567-2       | String 

### Type Fields
- About the Account Number type field. Yes, it's a string. So you must know that you need put the *-* normally as you see on the table above.
- About the value to inform the Amount Money you must use the type decimal.
- About the Move Type value you must choose sacar or depositar. Don't worry, if you don't put it in lowercase, the API sees and change it for ya.

### Here you can see the basic DER Model

<img src="https://tech.marinapelosi.com/fh-challenge-bank/20200920-lastversion-challengebank.png" alt="TDD img">


### Examples of requests to endpoints:

``` 
{{url_api}}api/check-balance/889955-1 // Case of valid account, as informed on the account table above
``` 

``` 
{{url_api}}api/check-balance/883 // To test some validation
``` 

``` 
{{url_api}}api/move-account-balance/889955-1/150.52/sacar // Case of get money from the account balance
``` 

``` 
{{url_api}}api/move-account-balance/889955-1/150.5a/sacar // To test some validation
``` 

``` 
{{url_api}}api/move-account-balance/889955-1/150.5a/DEPOSITAR // To test some validation
``` 

``` 
{{url_api}}api/move-account-balance/889955-1/150.5a/other // To test some validation
``` 

---


### Error List


On your way testing, maybe you could see some errors. There is your help to solve them!

|Situation                       |Error Message	                        | Solution
|---                             |---                                      |---
|Any kind of  | The :attribute field is required| You must put some value on the endpoint parameter because is mandatory to continue with the operation
|When trying check some balance  |Could not bring this account balance. Please, check if the account number is correct                | Just check the account number and try it again
|When trying move some account balance  | Could not make any movimentation on this account balance. Please, check if the account number is correct.| The type fields are valid (account, amountmoney and moveType), but it isn't a valid account in our database. Just check the account number and try it again
|When trying move some account balance  |  Sorry! The money you want is not how much you have | We can't give you nonexistent money, maybe in the future this API could lend you some. But just for now you can check your account and see the money you have enough to request or you also can put more money using the *depositar* moveType in the same endpoint.
|When trying move some account balance  | The Move Type must be sacar or depositar. Please, check our documentation | You must put the moveType as we informed here on the documentation. The allowed values are sacar or depositar. 

# Environment
You can see the environment on this repository: https://github.com/marinapelosi/fh-challenge-bank

And the API URL working on Digital Ocean: http://157.245.88.105:7778/