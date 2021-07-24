<fieldset {{ $attributes }}>
    <div class="row mt-4 mb-3">
        <div class="form-group col-md-3">
            <label for="area_construida">Área construída (&#13217;)</label>
            <input type="number" name="details[area_construida]" class="form-control"
                value="{{ old('details.area_construida', $details['area_construida'] ?? '') }}">
        </div>
        <div class="form-group col-md-3">
            <label for="area_terreno">Área do terreno (&#13217;)</label>
            <input type="number" name="details[area_terreno]" class="form-control"
                value="{{ old('details.area_terreno', $details['area_terreno'] ?? '') }}">
        </div>
        <div class="form-group col-md-3">
            <label for="escritorio">Escritório (&#13217;)</label>
            <input type="number" name="details[escritorio]" class="form-control"
                value="{{ old('details.escritorio', $details['escritorio'] ?? '') }}">
        </div>
        <div class="form-group col-md-3">
            <label for="estacionamento">Estacionamento (vagas)</label>
            <input type="number" name="details[estacionamento]" class="form-control"
                value="{{ old('details.estacionamento', $details['estacionamento'] ?? '') }}">
        </div>
    </div>
</fieldset>