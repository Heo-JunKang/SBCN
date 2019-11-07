#! /bin/bash

container=$1
action=$2

case $container in
    "all") 
        docker exec -d new_premium_office /bin/bash /etc/init.d/apache2 $action
        docker exec -d new_premium_api /bin/bash /etc/init.d/apache2 $action
        docker exec -d new_premium_service /bin/bash /etc/init.d/apache2 $action 
	docker exec -d db9555478d80_itbc_front /bin/bash /etc/init.d/apache2 $action
	docker exec -d itbc_admin /bin/bash /etc/init.d/apache2 $action
	docker exec -d itbc_api /bin/bash /etc/init.d/apache2 $action 
	docker exec -d tudal_front /bin/bash /etc/init.d/apache2 $action
	docker exec -d tudal_admin /bin/bash /etc/init.d/apache2 $action
	docker exec -d tudal_api /bin/bash /etc/init.d/apache2 $action ;;
    *)
        docker exec -d $container /bin/bash /etc/init.d/apache2 $action ;;
esac


