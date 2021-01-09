using RoadMap_WA.Data.Models;

using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Intefaces
{
    public interface IRMCategory
    {
        /// <summary>
        /// Выдаёт все категории RoadMap-ов
        /// </summary>
        List<RMCategory> AllRMCategories { get; }
    }
}
