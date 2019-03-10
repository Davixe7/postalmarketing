<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Validation\Rule;


class ClientsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, SkipsOnFailure, SkipsOnError, WithValidation
{
  public function model(array $row)
  {

    if( $row['identificacion'] && Client::where('client_id', $row['identificacion'])->exists() ){
      return null;
    }
    else if( $row['identificacion'] ){
      return new Client([
        "client_id"   => $row["identificacion"],
        "name"        => ($row["nombre_cliente"]) ? $row["nombre_cliente"] : 'SIN NOMBRE',
        "email"       => ($row["email"]) ? $row["email"] : 'SIN EMAIL',
        "postal_code" => $row["codigo_postal"],
        "province"    => $row["provincia"],
        "location"    => $row["localidad"],
        "address"     => $row["direccion"],
        "lat"         => ( array_key_exists('x', $row) ) ? $row["x"] : null,
        "lng"         => ( array_key_exists('y', $row) ) ? $row["y"] : null,
        "telephone"   => $row["telefono1"],
        "telephone_2" => $row["telefono2"]
      ]);
    }
  }

  public function batchSize():int{
    return 1;
  }

  public function chunkSize():int{
    return 100;
  }

  public function onFailure(Failure ...$failures)
  {
    foreach( $failures as $f ){
      $string = 'Error en la fila '. $f->row() . ' ' . $f->errors()[0];
      session()->push( 'validation.errors', $string );
    }
  }

  public function onError(\Throwable $exception)
  {
    foreach( $exception as $e){
      var_dump( $e );
    }
  }

  public function rules(): array
  {
    return [
      "identificacion"     => function ($att, $id, $fail) {
        if( $id != '' && Client::where('client_id', $id)->exists() ){
          $fail('Entrada duplicada para ID ' . $id);
        }
      }
    ];
  }
}
