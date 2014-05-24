#API 

##1.  Models

1. Plan : 
>plan_id
name
/ plan_description
/ price
/ storage_space
/ max_upstream
/ max_downstream
/ daily_shared_link_quota
/ bill_intervall (in days)

2.  User
>user_id
/ username
/ fullname
/ email
/ root_folder
/ plan
/ plan_suscribed_on
/ 

3.  Folder : 
>folder_id
/ user
/ name
/ lft
/ rgt
/ creation_date

4.  File : 
>file_id
/ name
/ folder
/ size
/ myme_type
/ tags
/ creation_date

5.  API_Oauth : 
>API_key
/ user
/ logged_in_on
/ logged_out_on
/ client_type


6.  myme_type : 
>myme_type_id
/ myme_type_name
/ css_class



##2.	API Main functions
