
    <form action="h.php" method="get">      
      <input type="hidden" name="action" value="do_add"    />
      <div class="row justify-content-between text-white p-2">
        
            <div class="form-group flex-fill mb-2">
              <input id="todo-input" name="title" type="text" class="form-control" value="">
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-2"><?php echo LANG_ADD_ITEM;?></button>
        
      </div>
     </form> 
     <p><?php session_start(); echo $_SESSION['id'] ;?></p>
      <div class="row" id="todo-container">
          <?php 
            for ($i=0;$i<count($items);$i++){
            ?>
            
                <div class="col col-12 p-2 todo-item" todo-id="${todo.id}">
                  <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <input type="checkbox"  >
                    </div>
                  </div>
                  <input type="text" readonly class="form-control " aria-label="Text input with checkbox" value="<?php echo htmlspecialchars($items[$i]['title']);?>">
                  <div class="input-group-append">
                    <button  class="btn btn-outline-secondary bg-danger text-white" type="button"  id="button-addon2" onclick="location='h.php?action=delete&item_id=<?php echo $items[$i]['item_id'];?>'">X</button>
                  </div>
                  </div>
            </div>
  
            
            <?php
            }
          ?>
      </div>
    
    