# cureAddiction
### Finial 'mini' project. calssName: daw - y2022


#### First of all, the design is **UGLY!** I'm counting on the backend functionality.

This is functional! **but**, it needs tons of refactoring!
also, it is not sanitized as it is not supposed to be put into production!
this is easily exploitable!
you can insert javascript malicious code in the blog! section available to all doctors.
form values are not sanitized in backend, so you can insert malicious sql code as well, to get admin rights, and basically hack into the "website".

## install notes:

1. create a database called "dbCureAddiction".
1. insert all of the code in db.sql into the sql query section of your phpmyadmin (mysql gui admin tool).
    -   localhost/phpmyadmin
1. insert the admin info from the mysql sql query section:
    - ```sql
        insert into admin(username, password, email) values(u,p,e);
        ```
    - substitute u, p, e with values of your choice according to your case.
1. clone this repo into your htdocs.
-   ```bash
    cd /opt/lampp/htdocs
    git clone https://github.com/kiskiller0/cureAddiction
    ```
1. start xampp (it might work with easy php, but it was not tested! proceed at your own responsibility!).
1. navigate to the localhost/cureAddiction link in your favorite webbrowser!
    -   localhost/cureAddiction/