<?php
$table->bigIncrements('id');	//Tipo de columna equivalente a auto-incremento UNSIGNED BIGINT (clave primaria).
$table->bigInteger('votes');	//Tipo de columna equivalente a BIGINT.
$table->binary('data');	//Tipo de columna equivalente a BLOB.
$table->boolean('confirmed');	//Tipo de columna equivalente a BOOLEAN.
$table->char('name', 100);	//Tipo de columna equivalente a CHAR con una longitud.
$table->date('created_at');	//Tipo de columna equivalente a DATE.
$table->time('mi_hora'); //Tipo de hora
$table->dateTime('created_at', 0);	//Tipo de columna equivalente a DATETIME con precisión (dígitos totales).
$table->dateTimeTz('created_at', 0);	//Tipo de columna equivalente a DATETIME (con zona horaria) con precisión (dígitos totales).
$table->decimal('amount', 8, 2);	//Tipo de columna equivalente a DECIMAL con una precisión (el total de dígitos) y escala de dígitos decimales.
$table->double('amount', 8, 2);	//Tipo de columna equivalente a DOUBLE con una precisión (el total de dígitos) y escala de dígitos decimales.
$table->enum('level', ['easy', 'hard']);	//Tipo de columna equivalente a ENUM.
$table->float('amount', 8, 2);	//Tipo de columna equivalente a FLOAT con una precisión (el total de dígitos) y escala de dígitos decimales.
$table->geometry('positions');	//Tipo de columna equivalente a GEOMETRY.
$table->geometryCollection('positions');	//Tipo de columna equivalente a GEOMETRYCOLLECTION.
$table->increments('id');	//Tipo de columna equivalente a auto-incremento UNSIGNED INTEGER (clave primaria).
$table->integer('votes');	//Tipo de columna equivalente a INTEGER.
$table->ipAddress('visitor');	//Tipo de columna equivalente a dirección IP.
$table->json('options');	//Tipo de columna equivalente a JSON.
$table->jsonb('options');	//Tipo de columna equivalente a JSONB.
$table->lineString('positions');	//Tipo de columna equivalente a LINESTRING.
$table->longText('description');	//Tipo de columna equivalente a LONGTEXT.
$table->macAddress('device');	//Tipo de columna equivalente a dirección MAC.
$table->mediumIncrements('id');	//Tipo de columna equivalente a auto-incremento UNSIGNED MEDIUMINT (clave primaria).
$table->mediumInteger('votes');	//Tipo de columna equivalente a MEDIUMINT.
$table->mediumText('description');	//Tipo de columna equivalente a MEDIUMTEXT.
$table->morphs('taggable');	//Agrega los tipos de columna equivalente a UNSIGNED BIGINT taggable_id y VARCHAR taggable_type.
$table->uuidMorphs('taggable');	//Agrega las columnas UUID equivalentes taggable_id CHAR(36) y taggable_type VARCHAR(255).
$table->multiLineString('positions');	//Tipo de columna equivalente a MULTILINESTRING.
$table->multiPoint('positions');	//Tipo de columna equivalente a MULTIPOINT.
$table->multiPolygon('positions');	//Tipo de columna equivalente a MULTIPOLYGON.
$table->nullableMorphs('taggable');	//Agrega versiones nullable de las columnas morphs().
$table->nullableUuidMorphs('taggable');	//Agrega versiones nullable de las columnas uuidMorphs().
$table->nullableTimestamps(0);	//Alias del método timestamps().
$table->point('position');	//Tipo de columna equivalente a POINT.
$table->polygon('positions');	//Tipo de columna equivalente a POLYGON.
$table->rememberToken();	//Agrega un tipo de columna equivalente a VARCHAR(100) que permita nulos para remember_token.
$table->set('flavors', ['strawberry', 'vanilla']);	//Tipo de columna equivalente a SET.
$table->smallIncrements('id');	//Tipo de columna equivalente a auto-incremento UNSIGNED SMALLINT (clave primaria).
$table->smallInteger('votes');	//Tipo de columna equivalente a SMALLINT.
$table->softDeletes(0);	//Agrega un tipo de columna equivalente a TIMESTAMP que permita nulos para deleted_at en eliminaciones lógicas con precisión (dígitos totales).
$table->softDeletesTz(0);	//Agrega un tipo de columna equivalente a TIMESTAMP que permita nulos para deleted_at (con la zona horaria) en eliminaciones lógicas con precisión (dígitos totales).
$table->string('name', 100);	//Tipo de columna equivalente a VARCHAR con una longitud.
$table->text('description');	//Tipo de columna equivalente a TEXT.
$table->time('sunrise', 0);	//Tipo de columna equivalente a TIME con precisión (dígitos totales).
$table->timeTz('sunrise', 0);	//Tipo de columna equivalente a TIME (con la zona horaria) con precisión (dígitos totales).
$table->timestamp('added_on', 0);	//Tipo de columna equivalente a TIMESTAMP con precisión (dígitos totales).
$table->timestampTz('added_on', 0);	//Tipo de columna equivalente a TIMESTAMP (con la zona horaria) con precisión (dígitos totales).
$table->timestamps(0);	//Agrega los tipos de columnas equivalentes a TIMESTAMP que permitan nulos para created_at y updated_at con precisión (dígitos totales).
$table->timestampsTz(0);	//Agrega los tipos de columnas equivalentes a TIMESTAMP (con la zona horaria) que permitan nulos para created_at y updated_at con precisión (dígitos totales).
$table->tinyIncrements('id');	//Tipo de columna equivalente a auto-incremento UNSIGNED TINYINT (clave primaria).
$table->tinyInteger('votes');	//Tipo de columna equivalente a TINYINT.
$table->unsignedBigInteger('votes');	//Tipo de columna equivalente a UNSIGNED BIGINT.
$table->unsignedDecimal('amount', 8, 2);	//Tipo de columna equivalente a UNSIGNED DECIMAL con una precisión (total de dígitos) escala (dígitos decimales).
$table->unsignedInteger('votes');	//Tipo de columna equivalente a UNSIGNED INTEGER.
$table->unsignedMediumInteger('votes');	//Tipo de columna equivalente a UNSIGNED MEDIUMINT.
$table->unsignedSmallInteger('votes');	//Tipo de columna equivalente a UNSIGNED SMALLINT.
$table->unsignedTinyInteger('votes');	//Tipo de columna equivalente a UNSIGNED TINYINT.
$table->uuid('id');	//Tipo de columna equivalente a UUID.
$table->year('birth_year');	//Tipo de columna equivalente a YEAR.
