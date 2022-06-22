select content from post where id_doctor in 
    (
        select distinct(id_doctor) from association
        where id_patient = 
        (
            select id from patient where username = $_POST["username"];
        );
);



select username from doctor;