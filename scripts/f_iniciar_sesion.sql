create or replace function f_iniciar_sesion
(
	p_email character varying,
	p_clave character varying
)RETURNS character as 
$body$
	begin
		begin
		EXCEPTION
			when others then 
				RAISE EXCEPTION '%', SQLERRM;
		end;
		return '???';
	end;
$body$
language plpgsql;