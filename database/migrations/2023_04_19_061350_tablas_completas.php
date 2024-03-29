<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {   
        
        // Deshabilitar temporalmente las restricciones de clave foránea
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Eliminar las tablas existentes si existen
        Schema::dropIfExists('tarea');
        Schema::dropIfExists('salida');
        Schema::dropIfExists('tipo_usuario');
        Schema::dropIfExists('entrada');
        Schema::dropIfExists('producto');
        Schema::dropIfExists('almacen');
        Schema::dropIfExists('rol_desempena');
        Schema::dropIfExists('ubicacion');
      

        Schema::create('ubicacion', function (Blueprint $table) {
            $table->increments('id_ubicacion');
            $table->string('pasillo');
            $table->integer('racks');
            $table->timestamps();
        });
        
        Schema::create('rol_desempena', function (Blueprint $table) {
            $table->increments('id_rol');
            $table->string('nombre_rol');
            $table->timestamps();
        });
        Schema::create('almacen', function (Blueprint $table) {
            $table->increments('id_almacen');
            $table->string('nombre_almacen');
            $table->timestamps();
        });
        
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id_producto');
            $table->string('nombre_producto');
            $table->text('descripcion');
            $table->integer('stock')->unsigned()->default(0);
            $table->float('precio');
            $table->integer('ubicacion_id')->unsigned();
            $table->integer('almacen_id')->unsigned();
            $table->foreign('ubicacion_id')->references('id_ubicacion')->on('ubicacion')->onDelete('cascade');
            $table->foreign('almacen_id')->references('id_almacen')->on('almacen')->onDelete('cascade');

            $table->timestamps();
        });
        
        Schema::create('entrada', function (Blueprint $table) {
            $table->increments('id_entrada');
            $table->integer('producto_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->foreign('producto_id')->references('id_producto')->on('producto')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('tipo_usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('empresa');
            $table->string('direccion');
            $table->string('pais');
            $table->string('correo');
            $table->string('contrasena');
            $table->string('telefono_celular');
            $table->string('telefono_fijo');
            $table->integer('rol_desempena')->unsigned();
            $table->foreign('rol_desempena')->references('id_rol')->on('rol_desempena')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('salida', function (Blueprint $table) {
            $table->increments('id_salida');
            $table->integer('producto_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->foreign('producto_id')->references('id_producto')->on('producto')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('tarea', function (Blueprint $table) {
            $table->increments('id_tarea');
            $table->text('descripcion');
            $table->integer('salida_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('ubicacion_id')->unsigned();
            $table->integer('entrada_id')->unsigned();
            $table->foreign('salida_id')->references('id_salida')->on('salida')->onDelete('cascade');
            $table->foreign('ubicacion_id')->references('id_ubicacion')->on('ubicacion')->onDelete('cascade');
            $table->foreign('entrada_id')->references('id_entrada')->on('entrada')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id_usuario')->on('tipo_usuario')->onDelete('cascade');
            $table->string('status_tarea')->default('No completado');
            $table->timestamps();
        });
        
        // Habilitar temporalmente las restricciones de clave foránea
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    
};
