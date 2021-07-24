<fieldset {{ $attributes }}>
    <div class="row mt-4 mb-3">

        <div class="form-group col-md-3">
            <label for="area_construida">Área construída (&#13217;)</label>
            <input type="number" name="details[area_construida]" class="form-control"
                value="{{ old('details.area_construida') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="area_terreno">Área do terreno (&#13217;)</label>
            <input type="number" name="details[area_terreno]" class="form-control"
                value="{{ old('details.area_terreno') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="area_fabril">Área fabril (&#13217;)</label>
            <input type="number" name="details[area_fabril]" class="form-control"
                value="{{ old('details.area_fabril') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="mezanino">Mezanino (&#13217;)</label>
            <input type="number" name="details[mezanino]" class="form-control" value="{{ old('details.mezanino') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="escritorio">Escritório (&#13217;)</label>
            <input type="number" name="details[escritorio]" class="form-control"
                value="{{ old('details.escritorio') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="resistencia_piso">Resistência do piso (Ton/&#13217;)</label>
            <input type="number" name="details[resistencia_piso]" class="form-control"
                value="{{ old('details.resistencia_piso') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="pe_direito">Pé direito (m)</label>
            <input type="number" name="details[pe_direito]" class="form-control"
                value="{{ old('details.pe_direito') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="vao_colunas">Vão entre colunas (m)</label>
            <input type="number" name="details[vao_colunas]" class="form-control"
                value="{{ old('details.vao_colunas') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="caixa_agua">Caixa d'água (l)</label>
            <input type="number" name="details[caixa_agua]" class="form-control"
                value="{{ old('details.caixa_agua') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="docas">Docas (qtde)</label>
            <input type="number" name="details[docas]" class="form-control" value="{{ old('details.docas') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="estacionamento">Estacionamento (vagas)</label>
            <input type="number" name="details[estacionamento]" class="form-control"
                value="{{ old('details.estacionamento') }}">
        </div>
        
        <div class="form-group col-md-3">
            <label for="tipo_construcao">Tipo de Construção</label>
            <input type="text" name="details[tipo_construcao]" class="form-control"
                value="{{ old('details.tipo_construcao') }}">
        </div>
    </div>

    <div class="col-md-12 mb-4">
        <div class="row">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="splinkers" name="details[splinkers]" value="Sim"
                    @if(old('details.splinkers')) checked @endif>
                <label class="form-check-label" for="splinkers">Splinkers</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="monitoramento" name="details[monitoramento]"
                    value="Sim" @if(old('details.monitoramento')) checked @endif>
                <label class="form-check-label" for="monitoramento">Monitoramento</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="cabine_blindada" name="details[cabine_blindada]"
                    value="Sim" @if(old('details.cabine_blindada')) checked @endif>
                <label class="form-check-label" for="cabine_blindada">Cabine blindada</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="ambulatorio" name="details[ambulatorio]" value="Sim"
                    @if(old('details.ambulatorio')) checked @endif>
                <label class="form-check-label" for="ambulatorio">Ambulatório</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="guarita" name="details[guarita]" value="Sim"
                    @if(old('details.guarita')) checked @endif>
                <label class="form-check-label" for="guarita">Guarita</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="refeitorio" name="details[refeitorio]" value="Sim"
                    @if(old('details.refeitorio')) checked @endif>
                <label class="form-check-label" for="refeitorio">Refeitório</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="cozinha" name="details[cozinha]" value="Sim"
                    @if(old('details.cozinha')) checked @endif>
                <label class="form-check-label" for="cozinha">Cozinha</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="poco_artesiano" name="details[poco_artesiano]"
                    value="Sim" @if(old('details.poco_artesiano')) checked @endif>
                <label class="form-check-label" for="poco_artesiano">Poço artesiano</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="vestiario_feminino"
                    name="details[vestiario_feminino]" value="Sim" @if(old('details.vestiario_feminino')) checked
                    @endif>
                <label class="form-check-label" for="vestiario_feminino">Vestiário feminino</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="vestiario_masculino"
                    name="details[vestiario_masculino]" value="Sim" @if(old('details.vestiario_masculino')) checked
                    @endif>
                <label class="form-check-label" for="vestiario_masculino">Vestiário masculino</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="heliponto" name="details[heliponto]" value="Sim"
                    @if(old('details.heliponto')) checked @endif>
                <label class="form-check-label" for="heliponto">Heliponto</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="plataforma_niveladora"
                    name="details[plataforma_niveladora]" value="Sim" @if(old('details.plataforma_niveladora')) checked
                    @endif>
                <label class="form-check-label" for="plataforma_niveladora">Plataforma Niveladora</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="ponte_rolante" name="details[ponte_rolante]"
                    value="Sim" @if(old('details.ponte_rolante')) checked @endif>
                <label class="form-check-label" for="ponte_rolante">Ponte Rolante</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="elevador_carga" name="details[elevador_carga]"
                    value="Sim" @if(old('details.elevador_carga')) checked @endif>
                <label class="form-check-label" for="elevador_carga">Elevador de Carga</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="cabine_primaria" name="details[cabine_primaria]"
                    value="Sim" @if(old('details.cabine_primaria')) checked @endif>
                <label class="form-check-label" for="cabine_primaria">Cabine Primária</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="marquise" name="details[marquise]" value="Sim"
                    @if(old('details.marquise')) checked @endif>
                <label class="form-check-label" for="marquise">Marquise</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="cross_docking" name="details[cross_docking]"
                    value="Sim" @if(old('details.cross_docking')) checked @endif>
                <label class="form-check-label" for="cross_docking">Cross Docking</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="patio_manobras" name="details[patio_manobras]"
                    value="Sim" @if(old('details.patio_manobras')) checked @endif>
                <label class="form-check-label" for="patio_manobras">Patio de manobras</label>
            </div>
        </div>
    </div>
</fieldset>