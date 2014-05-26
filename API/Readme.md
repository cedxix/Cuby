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
/ username *
/ encrypted_passwd *
/ email *
/ fullname
/ root_folder
/ plan
/ plan_subscription_datetime
/ reset_passwd_key
/ reset_passwd_at
/ sign_success_count
/ sign_success_count
/ last_signed_in_ip
/ user_created_at
/ user_updated_at
/ user_role (0.admin / 1.advanced / 2.user)
/ avatar

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
/ user
/ folder
/ size
/ myme_type
/ tags
/ created_datetime
/ updated_datetime

5.  API_Oauth : 
>API_key
/ user
/ last_logged_datetime
/ client_type (win32  / web / mobile )
/ created_at
/ revoked_at
/ expires_in (days)

6.  myme_type : 
>myme_type_id
/ myme_type_name
/ css_class

7.  file_activity : 
>activity_id
/ type (Downloaded / Uploaded / Shared / Previewed)
/ user (by ? )
/ date
/ time




##2.	API Main functions
