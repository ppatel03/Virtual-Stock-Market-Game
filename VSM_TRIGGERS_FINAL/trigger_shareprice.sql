create trigger shareprice_change before update on company_shareprice for each row 
begin
declare total1 INTEGER;
declare total2 INTEGER;
declare total INTEGER;
declare mutual INTEGER;
declare no_of_co INTEGER;
declare mutual_amount INTEGER;
declare mutual_shares INTEGER;
declare shareprice INTEGER;

select share_price into shareprice from company_shareprice where company_id = NEW.company_id;
select SUM(mutual_fund_balance) into mutual from customer_mutual_fund;
select COUNT(*) into no_of_co from company_shareprice;
set mutual_amount = mutual / no_of_co ;
set mutual_shares = mutual_amount / shareprice;

select SUM(no_of_shares) into total1 from customer_shares_normal where company_id = NEW.company_id;
select SUM(no_of_shares) into total2 from customer_shares_shortselling where company_id = NEW.company_id;
set total = total1 - total2 + mutual_shares ;
insert into log_total_shares (company_id,share_price,total_shares) values (NEW.company_id,NEW.share_price,total);
end |