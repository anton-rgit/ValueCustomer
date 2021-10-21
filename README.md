----------------INSTALLATION-----------------------------

DOCKER
(you have to be installed docker + docker-compose)

Clone this repository from github

Run script ```make init```

Run script ```make migrations```

This command will create tables as in task 1.1

Now your host - localhost:8888. If you want to change port - you can edit docker-compose.yml

-------------DOCUMENTATION---------------------

1 - Run ``` make fill-test-data```

This command will generate test data for our app in DB.

2 - Run ```make fill-value-customer-table```

This command will fill value_customer table as in task 1.2

3 - Then you can go to ```http://localhost:8888/customer/index``` and there you wiill see task 1.3 + 2