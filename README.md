SugarCRM-Cases-Grab-Accounts
============================

Customization for a SugarCRM System that will allow new Cases to automatically populate the Account Name if a Contact is specified. 

By default, SugarCRM will attempt to parse incoming emails for information on existing cases, or even create new cases, as is necessary. When the Case record is created, it is related to the inbound email and a Contact or Account, whichever has a matching email address.

For many customers, though, it will be beneficial to populate both an Account *and* a Contact field. For these systems, this customization exists. The logic is simple: when creating or modifying a Case record, associate the related Contact's Account to the Case (if there is no Account already populated). 
