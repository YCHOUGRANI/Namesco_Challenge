<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerContractDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::unprepared("
        CREATE TRIGGER `after_contract_details_insert` AFTER INSERT ON `contract_details`
        FOR EACH ROW BLOCK1: BEGIN
        DECLARE finished INTEGER DEFAULT 0;
        DECLARE start_at DATETIME;
        DECLARE finish_at DATETIME;
        
        DECLARE role_type_id VARCHAR(50);        
        DECLARE film_cursor CURSOR FOR
       SELECT f.start_at,f.finish_at,rt.id
       FROM films f
       INNER JOIN contracts c ON f.id=c.film_id 
       INNER JOIN contract_details cd ON cd.contract_id=c.id
       INNER JOIN roles r ON r.id=cd.role_id
       INNER JOIN role_types rt ON rt.id=r.role_type_id
       WHERE c.id  = NEW.contract_id
       Limit 1;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
       OPEN film_cursor;
       read_loop: LOOP
         FETCH film_cursor INTO start_at, finish_at,role_type_id;
        IF finished = 1 THEN 
                LEAVE read_loop;
                CLOSE film_cursor;
         END IF;
BLOCK2: BEGIN
     DECLARE ls_month int;
     DECLARE ls_year year(4);
     DECLARE months_cnt  int;
     DECLARE end_year year(4);
     DECLARE end_month  int;
     DECLARE counter  int DEFAULT 0;
     DECLARE amount decimal(8,2);
     DECLARE finished2 INTEGER DEFAULT 0;
 DECLARE monthly_spread_fixed_fee CURSOR FOR
       select 
DATE_FORMAT(m1, '%m'),DATE_FORMAT(m1, '%Y')
from
(
select 
(start_at - INTERVAL DAYOFMONTH(start_at)-1 DAY) 
+INTERVAL m MONTH as m1
from
(
select @rownum:=@rownum+1 as m from
(select 1 union select 2 union select 3 union select 4) t1,
(select 1 union select 2 union select 3 union select 4) t2,
(select 1 union select 2 union select 3 union select 4) t3,
(select 1 union select 2 union select 3 union select 4) t4,
(select @rownum:=-1) t0
) d1
) d2 
where m1<=finish_at
order by m1;
 DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished2 = 1;
 
 OPEN monthly_spread_fixed_fee;
 select FOUND_ROWS() into months_cnt ;
 loop2: LOOP
 FETCH monthly_spread_fixed_fee INTO ls_month, ls_year;
         IF finished2 = 1 THEN 
                LEAVE loop2;
                CLOSE monthly_spread_fixed_fee;
         END IF;

     
         if role_type_id = 3  then     
              set amount = new.fixed_fee/months_cnt;
         end if;
         if role_type_id = 2  then     
              set amount = new.fixed_monthly;
         end if;
         if role_type_id = 1  then     
              set amount = new.monthly_fee;
              set end_month=DATE_FORMAT(finish_at, '%m');
              set end_year=DATE_FORMAT(finish_at, '%Y');
              WHILE counter <= 36 DO
                      SET counter=counter+1;
                      set end_month=end_month+1;
                      if end_month = 13 then
                          set end_month=1;
                          set end_year=end_year +1;
                      end if;
                      INSERT INTO payments(amount,year,month,contract_detail_id,created_at,updated_at)
                      VALUES(amount,end_year,end_month,new.id,now(),now());
              END WHILE;
         end if;
      

        INSERT INTO payments(amount,year,month,contract_detail_id,created_at,updated_at)
        VALUES(amount,ls_year,ls_month,new.id,now(),now());
END LOOP  loop2;

END BLOCK2;
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
        DB::unprepared('DROP TRIGGER trigger_contract_details');
    }
}
