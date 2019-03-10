<?php

namespace App\Imports;

use App\Cadete;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Validation\Rule;

class CadetesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, SkipsOnFailure, SkipsOnError, WithValidation
{
  public function model(array $row)
  {
    $email = trim( $row['email'] );
    if( $row['id'] && Cadete::where('cadete_id', $row['id'])->exists() ){
      return null;
    }
    else if( $email != '' && Cadete::where('email', $email)->exists() ){
      return null;
    }
    return new Cadete([
      "cadete_id"   => $row["id"],
      "name"        => $row["recolector"],
      "email"       => $row["email"],
      "status"      => $row["estado"],
      "lastname_1"  => $row["apellido1"],
      "lastname_2"  => $row["apellido2"],
      "gender"      => $row["sexo"]
    ]);
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
      'id'     => function ($att, $id, $fail) {
        if( $id != null && Cadete::where('cadete_id', $id)->exists() ){
          $fail('Entrada duplicada para ID ' . $id);
        }
      },
      'email'  => function ($att, $val, $fail) {
        $email = trim( $val );
        if( $email != null && Cadete::where('email', $val)->exists() ){
          $fail('Entrada duplicada para email ' . $val);
        }
      }
    ];
  }

  public function customValidationMessages()
  {
    return [
      'email' => 'Entrada duplicada para email'
    ];
  }
}
