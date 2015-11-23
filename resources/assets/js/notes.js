new Vue({

    el: '#notes',
    data: {
        notes: [],
        newNote: ''
    },

    ready: function(){
        that = this;
        console.log('fire!');
        $.get( "/api/notes",{lesson_id: lesson_id, user_id: '{{ Auth::id() }}' } , function( data ) {
            notes_data = data.data;
            for(var i=0; i< notes_data.length; i++){
                that.notes.push({
                    body: notes_data[i].body
                });
            }
        });
    },

    methods: {



        addNote: function(e){
            e.preventDefault();

            if ( ! this.newNote) return;

            this.notes.push({
                body: this.newNote
            });

            $.post(
                '/api/notes',
                {
                    body: this.newNote,
                    lesson_id: lesson_id,
                    user_id: '{{ Auth::id() }}',
                    _token: token
                },
                function( data ){
                    console.log(data);
                }
            );

            this.newNote = '';


        },
        removeNote: function(note){
            this.notes.$remove(note);

        }
    }

});