create trigger mutual_update after update on customer_mutual_fund for each row
begin
declare a VARCHAR(10);
declare b INTEGER(10);

if OLD.mutual_fund_balance < NEW.mutual_fund_balance then
set a := 'INVEST';
set b := NEW.mutual_fund_balance  - OLD.mutual_fund_balance ;
else
set a := 'WITHDRAW';
set b := OLD.mutual_fund_balance - NEW.mutual_fund_balance ;
end if;

insert into log_mutual_fund (customer_id,invest_withdraw,transaction_amount) values (NEW.customer_id,a,b);

end |