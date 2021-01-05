using RoadMap_WA.Data.Intefaces;
using RoadMap_WA.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Mocks
{
    public class MockRMCategory : IRMCategory
    {
        public IEnumerable<RMCategory> AllRMCategories
        {
            get
            {
                return new List<RMCategory>
                {
                    new RMCategory { CategoryName = "Веб - программирование", Description = "Написание сайтов, тыры-пыры" },
                    new RMCategory { CategoryName = "Desktop программирование", Description = "Написание программ для ПК, тыры-пыры" },
                    new RMCategory { CategoryName = "Мобильное программирование", Description = "Написание программ для телефонов, тыры-пыры" }
                };
            }
        }
    }
}
