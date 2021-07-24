<div class="col-lg-3">
    <div class="property-sidebar">
        <h4>Buscar Imóvel</h4>
        <form action="/imoveis" method="post" class="sidebar-search">
            {{ csrf_field() }}
            <div class="sidebar-btn">
                <div class="bt-item">
                    <input type="radio" name="purpose" id="st-buy" value="1" checked>
                    <label for="st-buy">Venda</label>
                </div>
                <div class="bt-item">
                    <input type="radio" name="purpose" id="st-rent" value="2">
                    <label for="st-rent">Locação</label>
                </div>
            </div>
            
            <select name="type">
                <option value="">Tipo de Imóvel</option>
                @foreach ($types as $key => $val)
                <option value="{{$key}}">{{$val}}</option>
                @endforeach
            </select>
            
            <select name="city">
                <option value="">Cidade</option>
                @foreach ($cities as $city)
                <option>{{$city->city}}</option>
                @endforeach
            </select>
            {{-- <div class="room-size-range">
                <div class="price-text">
                    <label for="range_area_input">Área construída:</label>
                    <input type="text" id="range_area_input" readonly>
                </div>
                <div id="range_area" class="slider"></div>
            </div>
            <div class="price-range-wrap">
                <div class="price-text">
                    <label for="range_terreno_input">Área do Terreno:</label>
                    <input type="text" id="range_terreno_input" readonly>
                </div>
                <div id="range_terreno" class="slider"></div>
            </div> --}}
            <button type="submit" class="search-btn">Buscar</button>
        </form>

        <h4>Compartilhar</h4>
        <div class="share"></div>
    </div>
</div>