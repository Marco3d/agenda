<template>


    <tr >
      <th scope="row">{{ contact.id}}</th>
      <td>{{ contact.name}}</td>
      <td>{{ contact.email}}</td>
      <td>{{ contact.phone}}</td>

      <td><button type="button" class="btn btn-success btn-sm">Editar</button>
          <button type="button" class="btn btn-danger btn-sm" v-on:click.prevent = "onClickDelete()">Eliminar</button>
      </td>
    </tr>


</template>

<script>
    export default {

         props: ['contact'],
        mounted() {
            console.log('Component mounted.')
        },

        methods:{
           onClickDelete(){

                swal({
                  title: 'Está usted seguro?',
                  text: "Este proceso no se puede revertir!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, borrarlo!'
                }).then((result) => {
                       
                    
                  if (result.value) {

                 
                      axios.delete(`/contacts/${this.contact.id}`).then(()=>{
                         this.$emit('delete');
                    });
                    swal(
                      'Borrado!',
                      'El registro ha sido eliminado.',
                      'success'
                    )
                  }
                })

                
               
            },
         

         
      }
   }
</script>

  
                
                 










