<fieldset {{ $attributes }}>
    <div class="row mt-4 mb-3">
        <div class="form-group col-md-3">
            <label for="area_terreno">Área do terreno (&#13217;)</label>
            <input type="number" name="details[area_terreno]"
                value="{{ old('details.area_terreno') }}"
                class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="zoneamento">Zoneamento</label>
            <input type="text" name="details[zoneamento]" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="taxa_ocupacao">Taxa de ocupação</label>
            <input type="number" name="details[taxa_ocupacao]" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="aproveitamento">Coef. de Aproveitamento (%)</label>
            <input type="number" name="details[aproveitamento]" class="form-control">
        </div>
    </div>

    <div class="col-md-12 mb-4">
        <div class="row">
            <h5>App</h5>
        </div>
        <div class="row mb-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="lago" name="details[lago]" value="Sim">
                <label class="form-check-label" for="lago">Lago</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="nascente" name="details[nascente]" value="Sim">
                <label class="form-check-label" for="nascente">Nascente</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="rio" name="details[rio]" value="Sim">
                <label class="form-check-label" for="rio">Rio</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="arvores" name="details[arvores]" value="Sim">
                <label class="form-check-label" for="arvores">Árvores</label>
            </div>
        </div>

        <div class="row">
            <h5>Infra estrutura local</h5>
        </div>
        <div class="row mb-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="agua" name="details[agua]" value="Sim">
                <label class="form-check-label" for="agua">Água</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="esgoto" name="details[esgoto]" value="Sim">
                <label class="form-check-label" for="esgoto">Esgoto</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="luz" name="details[luz]" value="Sim">
                <label class="form-check-label" for="luz">Luz</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="poco_artesiano" name="details[poco_artesiano]"
                    value="Sim">
                <label class="form-check-label" for="poco_artesiano">Poço artesiano</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="fossa_septica" name="details[fossa_septica]"
                    value="Sim">
                <label class="form-check-label" for="fossa_septica">Fossa séptica</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="guia" name="details[guia]" value="Sim">
                <label class="form-check-label" for="guia">Guia</label>
            </div>
        </div>

        <div class="row">
            <h5>Potencial da área</h5>
        </div>
        <div class="row mb-5">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="comercial" name="details[comercial]" value="Sim">
                <label class="form-check-label" for="comercial">Comercial</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="industrial" name="details[industrial]" value="Sim">
                <label class="form-check-label" for="industrial">Industrial</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="condominio_residencial"
                    name="details[condominio_residencial]" value="Sim">
                <label class="form-check-label" for="condominio_residencial">Condominio Residencial</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="condominio_empresarial"
                    name="details[condominio_empresarial]" value="Sim">
                <label class="form-check-label" for="condominio_empresarial">Condominio Empresarial</label>
            </div>
        </div>
    </div>
</fieldset>