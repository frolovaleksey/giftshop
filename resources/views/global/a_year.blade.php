@if(isset($a_year))
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div>
                <label>
                    <select name="a_year" bb-cahnge bb-per_page  class="form-control  input-inline">
                        @for($i=2012; $i<date('Y')+5; $i++)
                            <option value="{{$i}}" @if( (date('n') <= 8 && $i==date('Y')-1 ) || (date('n') > 8 && $i==date('Y') ) )selected @endif>{{$i}}/{{$i+1}}</option>
                        @endfor
                    </select>
                </label>
                {{__('global.a_year')}}
            </div>
        </div>
    </div>
@endif
