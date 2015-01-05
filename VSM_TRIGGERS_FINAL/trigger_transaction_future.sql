create trigger future_transaction after update on customer_future_shares
for each row begin
declare bs VARCHAR(10);
declare shares INTEGER(10);
declare shareprice INTEGER(10);
if OLD.no_of_shares < NEW.no_of_shares then
set bs = 'BUY';
set shares = NEW.no_of_shares - OLD.no_of_shares;
else
set bs = 'SELL';
set shares = OLD.no_of_shares - NEW.no_of_shares ;
end if;
select share_price into shareprice from company_future_shareprice where company_id = NEW.company_id;
insert into log_transaction (customer_id,company_id,share_price,no_of_shares,buy_sell,normal_short)
 values 
(NEW.customer_id,NEW.company_id,shareprice,shares,bs,'future');
end |