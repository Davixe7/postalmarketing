<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Validation\Rule;

class ProductsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, SkipsOnFailure, SkipsOnError, WithValidation
{
  public function model(array $row)
  {
    if( $row['idd'] && Product::where('idd', $row['idd'])->exists() ){
      return null;
    }elseif ( $row['idd'] ) {
      return new Product([
        "enterprise_id" => $row["cod_empresa"],
        "idd"           => $row["idd"],
        "name"          => $row["equipo"],
        "serie"         => $row["serie"],
        "status"        => $row["tabla_oper"],
        "province"      => $row["provincia"],
        "location"      => $row["localidad"],
        "address"       => $row["direccion"],
        "lat"           => ( array_key_exists( 'x', $row ) ) ? $row["x"] : 0,
        "lng"           => ( array_key_exists( 'y', $row ) ) ? $row["y"] : 0,
        "postal_code"   => $row["codigo_postal"],
        "client_id"     => $row["identificacion"],
      ]);
    }
  }

  public function batchSize():int{
    return 50;
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
      'idd'     => function ($att, $id, $fail) {
        if( $id != null && Product::where('idd', $id)->exists() ){
          $fail('Entrada duplicada para IDD ' . $id);
        }
      }
    ];
  }

  public function customValidationMessages()
  {
    return [
      'idd' => 'Entrada duplicada para idd'
    ];
  }
}
