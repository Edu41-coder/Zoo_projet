const { MongoClient } = require('mongodb');
const uri = 'mongodb+srv://<username>:<password>@<your-atlas-cluster-url>/test?retryWrites=true&w=majority';

const client = new MongoClient(uri, { useNewUrlParser: true, useUnifiedTopology: true });

async function run() {
    try {
        const animalId = process.argv[2];
        await client.connect();
        const database = client.db('nb_cliques');
        const collection = database.collection('consultationParAnimal');
        const filter = { animal_id: animalId };
        const updateDoc = {
            $inc: { nbClique: 1 }
        };
        const options = { upsert: true };
        const result = await collection.updateOne(filter, updateDoc, options);
        console.log('Document updated', result);
    } finally {
        await client.close();
    }
}

run().catch(console.dir);