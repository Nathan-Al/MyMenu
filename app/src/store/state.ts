const state = {
  splash: true,
  filters: {
    prefix: 'par',
    list: [
      { code: 'name', value: 'nom', tag: 'filter-name-img' },
      { code: 'city', value: 'ville', tag: 'filter-city-img' }
    ]
  },
  sn: [
    { code: 'fb', value: 'facebook' },
    { code: 'tw', value: 'twitter' },
    { code: 'pt', value: 'pinterest' }
  ],
  tags: [
    { code: 'ff', value: 'fast food' },
    { code: 'ft', value: 'food-truc' },
    { code: 'cl', value: 'créole' },
    { code: 'jp', value: 'Japonaise' },
    { code: 'fc', value: 'française' },
    { code: 'cn', value: 'chinoise' },
    { code: 'in', value: 'indienne' }
  ],
  menu: [
    {
      id: 2,
      nom: 'case de Pepe !',
      sections: [
        {
          name: 'delicious',
          dishes: [
            { id: 1, name: 'one', price: '0.5$' },
            { id: 2, name: 'two', price: '0.25$' },
            { id: 3, name: 'three', price: '0.125$' }
          ]
        },
        {
          name: 'awful',
          dishes: [
            { id: 4, name: 'four', price: '500$' },
            { id: 5, name: 'five', price: '2500$' },
            { id: 6, name: 'six', price: '12500$' }
          ]
        }
      ]
    },
    {
      id: 1,
      nom: 'Korasore',
      sections: [
        {
          name: 'wonderous',
          dishes: [
            { id: 7, name: 'one', price: '0.5$' },
            { id: 8, name: 'two', price: '0.25$' },
            { id: 9, name: 'three', price: '0.125$' }
          ]
        }
      ]
    },
    {
      id: 3,
      nom: 'pecheurs incongrue',
      sections: [
        {
          name: 'marvelous',
          dishes: [
            { id: 10, name: 'one', price: '0.5$' },
            { id: 11, name: 'two', price: '0.25$' },
            { id: 12, name: 'three', price: '0.125$' }
          ]
        }
      ]
    }
  ],
  restaurant: []
}

export default state
