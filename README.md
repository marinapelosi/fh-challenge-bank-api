# Hello World!
Hi, my name is Marina and I'm thankful to be here making this challenge. This is the documentation for the developed software, and instructions for testing.

Normally, I use to make english modeling, code and documentation. I have no problem in make this in portuguese, if needed.

Let's go!

---
# FH Challenge Bank API REST

## Techinical Information

This REST API was developed following the [JSON API specification](https://jsonapi.org/). If you is familiarized with this convention you may not found problems to make basic requests. 

## Challenge Endpoints

|Method |Route Name	| Endpoint|Requires Auth? |Description |TDD function
|--- |--- |--- |--- |--- |---
|GET | Check Account Balance | api/check-balance/ {accountNumber} |No |No |No| Returns how much money the account has| testCheckBalance (tests/Unit)


## To test the endpoints you must use the fake data persisted via seeders and factories

|User        |Account Number
|---         |---            
|Random      |889955-1                                 
|Random      |435567-2

---


### Error List


On your way testing, maybe you could see some errors. There is your help to solve them!

|Situation                       |Error Message	                        | Solution
|---                             |---                                      |---
|When trying check some balance  |Could not bring this account balance. Please, check if the account number is correct                | Just check the account number and try it again
