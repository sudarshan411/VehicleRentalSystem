  -- To select model
 select * from Model M
 where exists(
 select * from units U
 where U.m_id = M.m_id
 and U.taken = 0
 );
 
 -- To select unit
 -- model_id
 select license from units
 where m_id = model_id;
 
 -- Booking
-- lic
update units set taken = 1
where license = lic;  
-- insert into bookings - make returned as 0
 
 -- Returning
 -- lic
update units set taken = 0
where license = lic;

-- uid, lic
-- update bookings 