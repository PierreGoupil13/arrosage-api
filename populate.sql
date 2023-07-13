-- Insert data into the 'plante' table
INSERT INTO public.plante (id, nom, type, dimension, exposition, arrosage, famille, description)
VALUES
    (1, 'Rose', 'Fleur', 'Moyenne', 'Plein soleil', 'Régulier', 'Rosacées', 'La rose est une plante vivace à fleurs ligneuses.'),
    (2, 'Basilic', 'Herbe', 'Petite', 'Semi-ombre', 'Régulier', 'Lamiacées', 'Le basilic est une herbe aromatique de la famille de la menthe.'),
    (3, 'Orchidée', 'Fleur', 'Petite', 'Lumière indirecte', 'Modéré', 'Orchidacées', 'L''orchidée est une plante à fleurs exotique et délicate.'),
    (4, 'Tomate', 'Légume', 'Moyenne', 'Plein soleil', 'Régulier', 'Solanacées', 'La tomate est un légume fruit apprécié dans de nombreux plats.'),
    (5, 'Fougère', 'Plante verte', 'Grande', 'Ombre partielle', 'Modéré', 'Polypodiacées', 'La fougère est une plante verte sans fleurs qui aime les endroits humides.'),
    (6, 'Lavande', 'Arbuste', 'Moyenne', 'Plein soleil', 'Faible', 'Lamiacées', 'La lavande est un arbuste aromatique aux fleurs violettes et au parfum apaisant.');

-- Insert data into the 'utilisateur' table
INSERT INTO public.utilisateur (id, nom, prenom, email, mdp, role, pseudo)
VALUES
    (1, 'Jean', 'Dupont', 'jean.dupont@example.com', 'motdepasse1', 'admin', 'johndoe'),
    (2, 'Marie', 'Lefebvre', 'marie.lefebvre@example.com', 'motdepasse2', 'utilisateur', 'marielefebvre'),
    (3, 'Paul', 'Martin', 'paul.martin@example.com', 'motdepasse3', 'utilisateur', 'paulmartin'),
    (4, 'Sophie', 'Dubois', 'sophie.dubois@example.com', 'motdepasse4', 'utilisateur', 'sophiedubois');

-- Insert data into the 'annonce' table
INSERT INTO public.annonce (id, etat, titre, description, numero, ville, rue, code_postal, utilisateur_prop_id)
VALUES
    (1, 'Active', 'Magnifiques Roses à Vendre', 'Nous avons une belle collection de roses à vendre. Elles sont disponibles dans différentes couleurs et tailles.', 123, 'Ville 1', 'Rue 1', '12345', 1),
    (2, 'Inactive', 'Basilic Frais pour la Cuisine Maison', 'Vous cherchez du basilic frais ? Nous proposons des feuilles de basilic de qualité idéales pour la cuisine maison.', 456, 'Ville 2', 'Rue 2', '67890', 2),
    (3, 'Active', 'Orchidées Exotiques à Collectionner', 'Découvrez notre sélection d''orchidées exotiques rares à ajouter à votre collection. Livraison dans le monde entier.', 789, 'Ville 3', 'Rue 3', '54321', 3),
    (4, 'Active', 'Tomates Bio du Jardin', 'Vente de tomates bio cultivées dans notre propre jardin. Savourez la fraîcheur et la saveur des tomates de saison.', 987, 'Ville 4', 'Rue 4', '09876', 4),
    (5, 'Inactive', 'Fougères d''Intérieur pour une Décoration Verte', 'Apportez une touche de verdure à votre intérieur avec nos fougères d''intérieur. Elles sont faciles à entretenir et ajoutent une ambiance apaisante.', 654, 'Ville 5', 'Rue 5', '13579', 1),
    (6, 'Active', 'Lavande Séchée pour vos Projets DIY', 'Nous proposons de la lavande séchée de qualité pour vos projets de bricolage. Utilisez-la pour la fabrication de bougies, de sachets parfumés et bien plus encore.', 321, 'Ville 6', 'Rue 6', '24680', 2);

-- Insert data into the 'annonce_plante' table
INSERT INTO public.annonce_plante (annonce_id, plante_id)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6);

-- Insert data into the 'annonce_utilisateur' table
INSERT INTO public.annonce_utilisateur (annonce_id, utilisateur_id)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 1),
    (6, 2);

-- Insert data into the 'commentaire' table
INSERT INTO public.commentaire (id, annonce_id, utilisateur_id, message)
VALUES
    (1, 1, 3, 'Ces roses sont magnifiques !'),
    (2, 2, 4, 'J''adore cuisiner avec du basilic frais !'),
    (3, 4, 1, 'Les tomates bio sont délicieuses !'),
    (4, 5, 2, 'Les fougères ajoutent une belle ambiance à la maison.'),
    (5, 6, 3, 'La lavande séchée sent si bon !');
