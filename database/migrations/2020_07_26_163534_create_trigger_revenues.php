<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerRevenues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::unprepared("
        CREATE TRIGGER `after_revenues_insert` AFTER INSERT ON `revenues`
        FOR EACH ROW 
        BLOCK1: BEGIN
        DECLARE finished INTEGER DEFAULT 0;
        DECLARE percentage_share decimal(8,2);
        DECLARE contract_detail_id int;
        DECLARE role_type_id int;
        DECLARE ls_month int;
        DECLARE ls_year year(4);
        
        DECLARE amount decimal(8,2);

       DECLARE contract_details_cursor CURSOR FOR
       SELECT cd.percentage_share, cd.id,rt.id
       FROM contract_details cd
       INNER JOIN contracts c ON c.id = cd.contract_id
       INNER JOIN roles r ON r.id=cd.role_id
       INNER JOIN role_types rt ON rt.id=r.role_type_id
       WHERE c.film_id  = NEW.film_id;
      
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
       OPEN contract_details_cursor;
       read_loop: LOOP
         FETCH contract_details_cursor INTO percentage_share, contract_detail_id,role_type_id;
        IF finished = 1 THEN 
                LEAVE read_loop;
                CLOSE contract_details_cursor;
         END IF;

         set ls_month=new.month;
         set ls_year=new.year;
      
      if (role_type_id = 1 ||  role_type_id = 3)  then
           set amount = new.amount*percentage_share/100;
           
      
   
      if role_type_id = 3  then
       
        set ls_month=new.month + 1;
        if ls_month = 13 then
             set ls_month=1;
             set ls_year=new.year +1;
        end if;
      end if;
       
        INSERT INTO payments(amount,year,month,contract_detail_id,created_at,updated_at)
        VALUES(amount,ls_year,ls_month,contract_detail_id,now(),now());
    
    end if;

END LOOP  read_loop;

END BLOCK1
        ");


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER trigger_revenues');
    }
}
