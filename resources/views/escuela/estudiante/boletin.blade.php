@extends('layouts.reportes')

@section('content')
<div class="container-fluid">
   <div class="row justify-content-center mt-4">
      <div class="col-md-5">

         <div class="row">
            <div class="col-md-6" style="border: 1px solid black;">C.E.F</div>
            <div class="col-md-6" style="border: 1px solid black;">BIMESTRE</div>
         </div>

         <table class="table">
            <thead>
               <tr>
                  <th style="border: 1px solid black;">No.</th>
                  <th style="border: 1px solid black;">ASIGNATURA</th>
                  <th style="border: 1px solid black;">1</th>
                  <th style="border: 1px solid black;">2</th>
                  <th style="border: 1px solid black;">3</th>
                  <th style="border: 1px solid black;">4</th>
                  <th style="border: 1px solid black;">PROM.FIANL</th>
               </tr>
            </thead>
            <tbody>
               @php
               $prome = 0;
               @endphp
               @foreach ($new_Array as $m)
               <tr>
                  <td style="border: 1px solid black;">{{$no}}</td>
                  <td style="border: 1px solid black;">{{$m[0]}}</td>
                  <td style="border: 1px solid black;">{{$m[1]}}</td>
                  <td style="border: 1px solid black;">{{$m[2]}}</td>
                  <td style="border: 1px solid black;">{{$m[3]}}</td>
                  <td style="border: 1px solid black;">{{$m[4]}}</td>
                  <td style="border: 1px solid black;">
                     @php
                     $prome += ($m[1] + $m[2] + $m[3] + $m[4]) / 4;
                     @endphp
                     {{number_format($prome, 2)}}
                  </td>
               </tr>
               <?php $no++;
               $prome = 0 ?>
               @endforeach

            </tbody>
         </table>


      </div>
   </div>
</div>
@endsection