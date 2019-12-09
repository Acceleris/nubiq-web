    <section class="intro">
      <div class="overlay">
        <?php $meta = get_post_meta( get_the_ID() ); ?> 
        <div class="io-content size3 large-title">
          <div class="title"><? echo $meta["nubiq_intro_title"][0] ?></div>
          <div class="subtitle"><? echo $meta["nubiq_intro_subtitle"][0] ?></div>
          <div class="arrow"></div>
          <div class="subsubt"><? echo $meta["nubiq_intro_1"][0] ?></div>
        </div>
      </div>
    </section>
    
    <section class="page-content">
      <h1><?=$page_meta["nubiq_title"]?></h1>
      <h2><?=$page_meta["nubiq_subtitle"]?></h2>
      <div class="text-content">
        <?php the_content()?>
      </div>
      <ul class="service-list certifed">
        <li>
          <div class="base"><h4>ISO 9001</h4></div>
          <div class="overlay">
            <h4>ISO 9001</h4>
            <p>Qualitätsnorm – Empfehlungen und An-forderungen an ein qua-litätsorientiertes Management System</p>
          </div>
        </li>
        <li>
          <div class="base"><h4>ISO 9001</h4></div>
          <div class="overlay">
            <h4>ISO 9001</h4>
            <p>Qualitätsnorm – Empfehlungen und An-forderungen an ein qua-litätsorientiertes Management System</p>
          </div>
        </li>
        <li>
          <div class="base"><h4>ISO 20000</h4></div>
          <div class="overlay">
            <h4>ISO 20000</h4>
            <p>Qualitätsnorm – Empfehlungen und An-forderungen an ein qua-litätsorientiertes Management System</p>
          </div>
        </li>
        <li>
          <div class="base"><h4>ISO 27001</h4></div>
          <div class="overlay">
            <h4>ISO 27001</h4>
            <p>Qualitätsnorm – Empfehlungen und An-forderungen an ein qua-litätsorientiertes Management System</p>
          </div>
        </li>
        <li>
          <div class="base"><h4>ISO 27018</h4></div>
          <div class="overlay">
            <h4>ISO 27018</h4>
            <p>Qualitätsnorm – Empfehlungen und An-forderungen an ein qua-litätsorientiertes Management System</p>
          </div>
        </li>
        
      </ul>
    </section>
