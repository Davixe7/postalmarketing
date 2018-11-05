<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
  public function model(array $row)
  {
    return new Product([
      "ent_id"      => $row["cod_empresa"],
      "name"        => $row["equipo"],
      "serie"       => $row["serie"],
      "status"      => $row["tabla_oper"],
      "state"       => $row["provincia"],
      "location"    => $row["localidad"],
      "address"     => $row["direccion"],
      "cp"          => $row["codigo_postal"],
      "client_id"   => $row["identificacion"],
    ]);

    var_dump( $row );
  }

  public function batchSize():int{
    return 50;
  }

  public function chunkSize():int{
    return 100;
  }
}
