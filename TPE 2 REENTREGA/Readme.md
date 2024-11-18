SIMHOR

Nuestro modelo, presenta el caso de una concesionaria de automotores (llamada "SIMHOR"), donde al momento, existen tres tablas, dos de ellas vinculadas. 

Dichas tablas, presentan: 
1) Los automotores con que cuenta la empresa para vender; 
2) Las sucursales de la concesionaria.
3) Lo usuarios. 

En cuanto a la relación 1 a N, si bien en el mundo real, la relación entre dichas tablas podría ser N a N, en éste caso es 1 a N, porque a la tabla que refiere a los automotores, la interpretamos como ilustrativa de aquel lugar donde físicamente se encuentra cada unidad, por ende, cada automotor puede estar físicamente en una única sucursal, en cada momento dado. Y en una misma sucursal, pueden haber varios automotores en ese mismo momento.

La vinculación entre tablas, está dada en que La de automotores, en cada entrada, lleva como clave foránea, el ID de la sucursal en la que el vehículo se encuentra.

En archivo separado, acompañamos el diagrama MER. 


Para poder interactuar con la interfaz, se debe montar la base de datos, creando una nueva DB en phpmyadmin, para allí importar el archivo "simhor_automotores.sql" que contiene la DB correspondiente.
Tras ello,se puede operar desde localhost, en el browser.

El ussuario es : webadmin
La contraseña es: admin


Los integrantes de éste grupo, somos:
PRESA, Simón
GARCIA DUPLEIX, Horacio Urbano
