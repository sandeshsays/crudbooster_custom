<select id='list-icon' class="form-control" name="icon" style="font-family: 'FontAwesome', Helvetica;">
    <option value="">** Select an Icon</option>
    @foreach($fontawesome as $font)
<<<<<<< HEAD
        <option value='fa fa-{{$font}}'
                {{ (CRUDBooster::getCurrentModule()->icon == "fa fa-$font")?"selected":"" }} data-label='{{$font}}'>{{$font}}</option>
=======
        <option value='fa fa-{{$font}}' {{ ($row->icon == "fa fa-$font")?"selected":"" }} data-label='{{$font}}'>{{$font}}</option>
>>>>>>> 5.4.0
    @endforeach
</select>