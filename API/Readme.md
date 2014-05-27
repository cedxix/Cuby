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

2.  user_id
>user_id
/ user_name *
/ encrypted_passwd *
/ email *
/ fullname
/ folder_id
/ plan_id
/ plan_subscription_datetime
/ reset_passwd_key
/ reset_passwd_at
/ sign_success_count
/ sign_success_count
/ last_signed_in_ip
/ user_id_created_at
/ user_id_updated_at
/ user_id_role (0.admin / 1.advanced / 2.user_id)
/ avatar

3.  Folder : 
>folder_id
/ user_id
/ name
/ lft
/ rgt
/ creation_date

4.  File : 
>file_id
/ name
/ user_id
/ folder_id
/ size
/ myme_type_id
/ tags
/ created_datetime
/ updated_datetime

5.  Folder_contributor : 
>folder_id
/ contributor_id

6.  API_Oauth : 
>API_key
/ user_id
/ last_logged_datetime
/ client_type (win32  / web / mobile )
/ created_at
/ revoked_at
/ expires_in (days)

7.  myme_type : 
>myme_type_id
/ myme_type_name
/ css_class

8.  file_activity : 
>activity_id
/ type (Downloaded / Uploaded / Shared / Previewed)
/ user_id (by ? )
/ file_id
/ date
/ time




##2.	API Main functions
