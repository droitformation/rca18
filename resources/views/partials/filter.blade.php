<div id="masterFilter">

    <div class="widget list categories clear">
        <h3><i class="icon-tasks"></i> &nbsp;Catégories</h3>

           @if(!empty($categories))

              <select id="arret-chosen" name="category_check" data-placeholder="Choisir une ou plusieurs catégories" style="width:100%" multiple class="chosen-select category">
                  @foreach($categories as $parent_id => $liste)
                      @if(isset($parents[$parent_id]))
                          <?php $label = $parents[$parent_id]; ?>
                      @else
                          <?php $label = 'Général'; ?>
                      @endif
                      <optgroup label="{{ $label }}">
                          @foreach($liste as $categorie)
                              <option value="c{{ $categorie->id }}">{{ $categorie->title }}</option>
                          @endforeach
                      </optgroup>
                  @endforeach
              </select>

          @endif

    </div><!--END WIDGET-->

    <div class="widget list annees clear">
        <h3><i class="icon-calendar"></i> &nbsp;Années</h3>
        @if(!empty($annees))
        <ul id="arret-annees" class="list annees clear">
            @foreach($annees as $annee)
                <li><a rel="y{{ $annee }}" href="#">Paru en {{ $annee }}</a></li>
            @endforeach
        </ul>
        @endif
    </div><!--END WIDGET-->

</div><!--END SIDEBAR-->

