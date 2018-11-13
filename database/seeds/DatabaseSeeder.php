<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('cargos')->insert([
            'CAR_NOMBRE' => 'Supervisor de Operación',
            'CAR_JORNADA' => 'Completa',
            'CAR_DOTACION' => 'No',
            'CAR_DEPENDENCIA' => 'Supervisor de la Operación',
            'CAR_SUPERVICION' => 'Cajero, Marcador de Ticket, Asistente de Patio',
        ]);
        DB::table('cargos')->insert([
            'CAR_NOMBRE' => 'Cajero Recaudador',
            'CAR_JORNADA' => 'Completa',
            'CAR_DOTACION' => 'No',
            'CAR_DEPENDENCIA' => 'Supervisor de la Operación',
            'CAR_SUPERVICION' => 'No',
        ]);
        DB::table('cargos')->insert([
            'CAR_NOMBRE' => 'Marcador de Ticket',
            'CAR_JORNADA' => 'Completa',
            'CAR_DOTACION' => 'No',
            'CAR_DEPENDENCIA' => 'Supervisor de la Operación',
            'CAR_SUPERVICION' => 'No',
        ]);
        DB::table('cargos')->insert([
            'CAR_NOMBRE' => 'Asistente de Patio',
            'CAR_JORNADA' => 'Completa',
            'CAR_DOTACION' => 'No',
            'CAR_DEPENDENCIA' => 'Supervisor de la Operación',
            'CAR_SUPERVICION' => 'No',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT001',
            'TARIFAS_TIPODEATENCION' => 'Consulta Médica',
            'TARIFAS_COBRODEATENCION' => '$700 Maximo',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT001',
            'TARIFAS_TIPODEATENCION' => 'Realización de Examanes',
            'TARIFAS_COBRODEATENCION' => '$700 Maximo',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT001',
            'TARIFAS_TIPODEATENCION' => 'Revision de Examanes',
            'TARIFAS_COBRODEATENCION' => '$700 Maximo',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT002',
            'TARIFAS_TIPODEATENCION' => 'Pagos en Clinica',
            'TARIFAS_COBRODEATENCION' => 'Cobro Por Permanencia',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT002',
            'TARIFAS_TIPODEATENCION' => 'Retiro de Examenes',
            'TARIFAS_COBRODEATENCION' => 'Cobro Por Permanencia',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT002',
            'TARIFAS_TIPODEATENCION' => 'Agendar Hora Medica',
            'TARIFAS_COBRODEATENCION' => 'Cobro Por Permanencia',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT003',
            'TARIFAS_TIPODEATENCION' => 'Atencion de Emergencia',
            'TARIFAS_COBRODEATENCION' => 'Cobro 0',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT003',
            'TARIFAS_TIPODEATENCION' => 'Minusvalidos (Con cruz de malta o Credencial)',
            'TARIFAS_COBRODEATENCION' => 'Cobro 0',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT003',
            'TARIFAS_TIPODEATENCION' => 'Pase Liberado',
            'TARIFAS_COBRODEATENCION' => 'Cobro 0',
        ]);
        DB::table('tarifas')->insert([
            'TARIFAS_CODIGO' => 'AT004',
            'TARIFAS_TIPODEATENCION' => 'Otro',
            'TARIFAS_COBRODEATENCION' => 'Presentar Documentos al pasar por caja para realizar descuento correspondiente',
        ]);
        DB::table('planes')->insert([
            'PLAN_NOMBRE' => 'Basico',
            'PLAN_PRECIO' => '16000',
            'PLAN_CARACTERISTICAS' => 'Plan con uso gratuito del estacionamiento durante el mes completo, incluyendo la tarjeta de abonado que permite abrir y cerrar barreras',
            'PLAN_FECHADEPAGO' => date("Y-m-d"),
        ]);
        DB::table('estados')->insert([
            'EST_NOMBRE' => 'Vehiculo Ingresado',
        ]);
        DB::table('estados')->insert([
            'EST_NOMBRE' => 'Ticket Pagado',
        ]);
        DB::table('estados')->insert([
            'EST_NOMBRE' => 'Ticket Cancelado',
        ]);
        DB::table('estados')->insert([
            'EST_NOMBRE' => 'Vechiculo Pendiente',
        ]);
    }
}
