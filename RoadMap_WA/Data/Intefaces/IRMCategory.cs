using RoadMap_WA.Data.Models;

using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Intefaces
{
    interface IRMCategory
    {
        /// <summary>
        /// Выдаёт все категории RoadMap-ов
        /// </summary>
        IEnumerable<RMCategory> AllRMCategories { get; }
    }
}
